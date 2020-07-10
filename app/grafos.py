import sys
import networkx as nx
import pandas as pd
import matplotlib.pyplot as plt

DG=nx.DiGraph()

spain_flights = pd.read_csv("sample_spain_flights.csv")

for row in spain_flights.iterrows():
    DG.add_edge(row[1]["origin"],
                row[1]["destination"],
                duration=row[1]["duration"],
                price=row[1]["price"])
#print (DG.nodes(data=True))

nx.draw_circular(DG,
                 node_color="lightblue",
                 edge_color="gray",
                 font_size=24,
                 width=2, with_labels=True, node_size=3500,
)
plt.show()